#include "Controls.h"
#include <QBoxLayout>
#include <QSlider>
#include <QStyle>
#include <QToolButton>
#include <QComboBox>
#include <QAudio>

Controls::Controls(QWidget* parent)
    : QWidget(parent)
{
    playButton = new QToolButton(this);
    playButton->setIcon(style()->standardIcon(QStyle::SP_MediaPlay));

    connect(playButton, &QAbstractButton::clicked, this, &Controls::playClicked);

    stopButton = new QToolButton(this);
    stopButton->setIcon(style()->standardIcon(QStyle::SP_MediaStop));
    stopButton->setEnabled(false);

    connect(stopButton, &QAbstractButton::clicked, this, &Controls::stop);

    nextButton = new QToolButton(this);
    nextButton->setIcon(style()->standardIcon(QStyle::SP_MediaSkipForward));

    connect(nextButton, &QAbstractButton::clicked, this, &Controls::next);

    prevButton = new QToolButton(this);
    prevButton->setIcon(style()->standardIcon(QStyle::SP_MediaSkipBackward));

    connect(prevButton, &QAbstractButton::clicked, this, &Controls::previous);

    muteButton = new QToolButton(this);
    muteButton->setIcon(style()->standardIcon(QStyle::SP_MediaVolume));

    connect(muteButton, &QAbstractButton::clicked, this, &Controls::muteClicked);

    volSlider = new QSlider(Qt::Horizontal, this);
    volSlider->setRange(0, 100);

    connect(volSlider, &QSlider::valueChanged, this, &Controls::onVolumeSliderValueChanged);

    rateBox = new QComboBox(this);
    rateBox->addItem("0.5x", QVariant(0.5));
    rateBox->addItem("1.0x", QVariant(1.0));
    rateBox->addItem("2.0x", QVariant(2.0));
    rateBox->setCurrentIndex(1);

    connect(rateBox, QOverload<int>::of(&QComboBox::activated), this, &Controls::updateRate);

    QBoxLayout* layout = new QHBoxLayout;
    layout->setMargin(0);
    layout->addWidget(stopButton);
    layout->addWidget(prevButton);
    layout->addWidget(playButton);
    layout->addWidget(nextButton);
    layout->addWidget(muteButton);
    layout->addWidget(volSlider);
    layout->addWidget(rateBox);
    setLayout(layout);
}

QMediaPlayer::State Controls::state() const
{
    return playState;
}

void Controls::setState(QMediaPlayer::State state)
{
    if (state != playState) {
        playState = state;

        switch (state) {
        case QMediaPlayer::StoppedState:
            stopButton->setEnabled(false);
            playButton->setIcon(style()->standardIcon(QStyle::SP_MediaPlay));
            break;
        case QMediaPlayer::PlayingState:
            stopButton->setEnabled(true);
            playButton->setIcon(style()->standardIcon(QStyle::SP_MediaPause));
            break;
        case QMediaPlayer::PausedState:
            stopButton->setEnabled(true);
            playButton->setIcon(style()->standardIcon(QStyle::SP_MediaPlay));
            break;
        }
    }
}

int Controls::volume() const
{
    qreal linearVolume =  QAudio::convertVolume(volSlider->value() / qreal(100),
                                                QAudio::LogarithmicVolumeScale,
                                                QAudio::LinearVolumeScale);

    return qRound(linearVolume * 100);
}

void Controls::setVolume(int volume)
{
    qreal logarithmicVolume = QAudio::convertVolume(volume / qreal(100),
                                                    QAudio::LinearVolumeScale,
                                                    QAudio::LogarithmicVolumeScale);

    volSlider->setValue(qRound(logarithmicVolume *100));
}

bool Controls::isMuted() const
{
    return playMute;
}

void Controls::setMuted(bool muted)
{
    if (muted != playMute) {
        playMute = muted;

        muteButton->setIcon(style()->standardIcon(muted
                ? QStyle::SP_MediaVolumeMuted
                : QStyle::SP_MediaVolume));
    }
}

void Controls::playClicked()
{
    switch (playState) {
    case QMediaPlayer::StoppedState:
    case QMediaPlayer::PausedState:
        emit play();
        break;
    case QMediaPlayer::PlayingState:
        emit pause();
        break;
    }
}

void Controls::muteClicked()
{
    emit changeMuting(!playMute);
}

qreal Controls::playbackRate() const
{
    return rateBox->itemData(rateBox->currentIndex()).toDouble();
}

void Controls::setPlaybackRate(float rate)
{
    for (int i = 0; i < rateBox->count(); ++i) {
        if (qFuzzyCompare(rate, float(rateBox->itemData(i).toDouble()))) {
            rateBox->setCurrentIndex(i);
            return;
        }
    }

    rateBox->addItem(QString("%1x").arg(rate), QVariant(rate));
    rateBox->setCurrentIndex(rateBox->count() - 1);
}

void Controls::updateRate()
{
    emit changeRate(playbackRate());
}

void Controls::onVolumeSliderValueChanged()
{
    emit changeVolume(volume());
}
