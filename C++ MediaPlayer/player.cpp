#include "Player.h"
#include "Controls.h"
#include "Playlist.h"
#include "VideoWidget.h"
#include <QMediaMetaData>
#include <QMediaService>
#include <QMediaPlaylist>
#include <QtWidgets>
#include <QVideoProbe>
#include <QAudioProbe>

Player::Player(QWidget* parent)
    : QWidget(parent)
{
    setWindowIcon(QIcon(":/images/images/Main.png"));

    QSize availableSize = qApp->desktop()->geometry().size();
        int width = availableSize.width();
        int height = availableSize.height();
        qDebug() << "Available dimensions " << width << "x" << height;
        width *= 0.5;
        height *= 0.5;
        qDebug() << "Computed dimensions " << width << "x" << height;
        QSize newSize( width, height );

        setGeometry(
            QStyle::alignedRect(
                Qt::LeftToRight,
                Qt::AlignCenter,
                newSize,
                qApp->desktop()->geometry()
            )
        );

    player = new QMediaPlayer(this);
    player->setAudioRole(QAudio::VideoRole);

    playlist = new QMediaPlaylist();
    player->setPlaylist(playlist);

    vidWidget = new VideoWidget(this);
    player->setVideoOutput(vidWidget);

    pllModel = new Playlist(this);
    pllModel->setPlaylist(playlist);

    pllView = new QListView(this);
    pllView->setModel(pllModel);
    pllView->setCurrentIndex(pllModel->index(playlist->currentIndex(), 0));

    slider = new QSlider(Qt::Horizontal, this);
    slider->setRange(0, player->duration() / 1000);

    lblDuration = new QLabel(this);

    QPushButton* openButton = new QPushButton(tr(""), this);
    openButton->setStyleSheet("border-image:url(:/images/images/Folder.png); width:22px;height:22px;");

    Controls *controls = new Controls(this);
    controls->setState(player->state());
    controls->setVolume(player->volume());
    controls->setMuted(controls->isMuted());

    QPushButton* openButton2 = new QPushButton(tr(""), this);
    fullScreenn = openButton2;
    openButton2->setStyleSheet("border-image:url(:/images/images/FullScreen.png); width:18px;height:18px;");
    fullScreenn->setCheckable(true);


    connect(player, &QMediaPlayer::durationChanged, this, &Player::duration);
    connect(player, &QMediaPlayer::positionChanged, this, &Player::position);
    connect(playlist, &QMediaPlaylist::currentIndexChanged, this, &Player::position);
    connect(player, &QMediaPlayer::videoAvailableChanged, this, &Player::videoAvailablity);
    connect(pllView, &QAbstractItemView::activated, this, &Player::jump);
    connect(slider, &QSlider::sliderMoved, this, &Player::seek);
    connect(openButton, &QPushButton::clicked, this, &Player::open);
    connect(controls, &Controls::play, player, &QMediaPlayer::play);
    connect(controls, &Controls::pause, player, &QMediaPlayer::pause);
    connect(controls, &Controls::stop, player, &QMediaPlayer::stop);
    connect(controls, &Controls::next, playlist, &QMediaPlaylist::next);
    connect(controls, &Controls::previous, this, &Player::previous);
    connect(controls, &Controls::changeVolume, player, &QMediaPlayer::setVolume);
    connect(controls, &Controls::changeMuting, player, &QMediaPlayer::setMuted);
    connect(controls, &Controls::changeRate, player, &QMediaPlayer::setPlaybackRate);
    connect(controls, &Controls::stop, vidWidget, QOverload<>::of(&QVideoWidget::update));
    connect(player, &QMediaPlayer::stateChanged, controls, &Controls::setState);
    connect(player, &QMediaPlayer::volumeChanged, controls, &Controls::setVolume);
    connect(player, &QMediaPlayer::mutedChanged, controls, &Controls::setMuted);

    QBoxLayout *displayLayout = new QHBoxLayout;
    displayLayout->addWidget(vidWidget, 2);
    displayLayout->addWidget(pllView);

    QBoxLayout *controlLayout = new QHBoxLayout;
    controlLayout->setMargin(0);
    controlLayout->addWidget(openButton);
    controlLayout->addStretch(1);
    controlLayout->addWidget(controls);
    controlLayout->addStretch(1);
    controlLayout->addWidget(fullScreenn);

    QBoxLayout *layout = new QVBoxLayout;
    layout->addLayout(displayLayout);
    QHBoxLayout *hLayout = new QHBoxLayout;
    hLayout->addWidget(slider);
    hLayout->addWidget(lblDuration);
    layout->addLayout(hLayout);
    layout->addLayout(controlLayout);

    setLayout(layout);

    if (!playerAvailablity()) {
        QMessageBox::warning(this, tr("Player not available at the moment"),tr("Please try restarting the application"));
        controls->setEnabled(false);
        openButton->setEnabled(false);
    }
}

Player::~Player()
{
}

bool Player::playerAvailablity() const
{
    return player->isAvailable();
}

void Player::open()
{
    QFileDialog fileDialog(this);
    fileDialog.setAcceptMode(QFileDialog::AcceptOpen);
    fileDialog.setWindowTitle(tr("Open A File"));
    QStringList supportedMimeTypes = player->supportedMimeTypes();
    if (!supportedMimeTypes.isEmpty()) {
        supportedMimeTypes.append("Audio/x-m3u");
        fileDialog.setMimeTypeFilters(supportedMimeTypes);
    }
    fileDialog.setDirectory(QStandardPaths::standardLocations(QStandardPaths::MoviesLocation).value(0, QDir::homePath()));
    if (fileDialog.exec() == QDialog::Accepted)
        addPlaylist(fileDialog.selectedUrls());
}

static bool isPlaylist(const QUrl &url)
{
    if (!url.isLocalFile())
        return false;
    const QFileInfo fileInfo(url.toLocalFile());
    return fileInfo.exists() && !fileInfo.suffix().compare(QLatin1String("m3u"), Qt::CaseInsensitive);
}

void Player::addPlaylist(const QList<QUrl> &urls)
{
    for (auto &url: urls) {
        if (isPlaylist(url))
            playlist->load(url);
        else
            playlist->addMedia(url);
    }
}

void Player::audioRole(const QString &role)
{
    player->setCustomAudioRole(role);
}

void Player::duration(qint64 duration)
{
    durationn = duration / 1000;
    slider->setMaximum(durationn);
}

void Player::position(qint64 progress)
{
    if (!slider->isSliderDown())
        slider->setValue(progress / 1000);

    durationInfo(progress / 1000);
}

void Player::previous()
{
        playlist->previous();
}

void Player::jump(const QModelIndex &index)
{
    if (index.isValid()) {
        playlist->setCurrentIndex(index.row());
        player->play();
    }
}

void Player::playlistt(int currentItem)
{
    pllView->setCurrentIndex(pllModel->index(currentItem, 0));
}

void Player::seek(int seconds)
{
    player->setPosition(seconds * 1000);
}

void Player::videoAvailablity(bool available)
{
    if (!available) {
        disconnect(fullScreenn, &QPushButton::clicked, vidWidget, &QVideoWidget::setFullScreen);
        disconnect(vidWidget, &QVideoWidget::fullScreenChanged, fullScreenn, &QPushButton::setChecked);
        vidWidget->setFullScreen(false);
    } else {
        connect(fullScreenn, &QPushButton::clicked, vidWidget, &QVideoWidget::setFullScreen);
        connect(vidWidget, &QVideoWidget::fullScreenChanged, fullScreenn, &QPushButton::setChecked);

        if (fullScreenn->isChecked())
            vidWidget->setFullScreen(true);
    }
}

void Player::trkInfo(const QString &info)
{
    trkInf = info;

    if (statBar) {
        statBar->showMessage(trkInf);
        statLabel->setText(statInf);
    } else {
        if (!statInf.isEmpty())
            setWindowTitle(QString("%1 | %2").arg(trkInf).arg(statInf));
        else
            setWindowTitle(trkInf);
    }
}

void Player::statInfo(const QString &info)
{
    statInf = info;

    if (statBar) {
        statBar->showMessage(trkInf);
        statLabel->setText(statInf);
    } else {
        if (!statInf.isEmpty())
            setWindowTitle(QString("%1 | %2").arg(trkInf).arg(statInf));
        else
            setWindowTitle(trkInf);
    }
}

void Player::error()
{
    statInfo(player->errorString());
}

void Player::durationInfo(qint64 currentInfo)
{
    QString tStr;
    if (currentInfo || durationn) {
        QTime currentTime((currentInfo / 3600) % 60, (currentInfo /60) % 60,
            currentInfo % 60, (currentInfo *1000) % 1000);
        QTime totalTime((durationn / 3600) % 60, (durationn / 60) % 60,
            durationn % 60, (durationn *1000) % 1000);
        QString format = "mm:ss";
        if (durationn > 3600)
            format = "hh:mm:ss";
        tStr = currentTime.toString(format) + " / " + totalTime.toString(format);
    }
    lblDuration->setText(tStr);
}

