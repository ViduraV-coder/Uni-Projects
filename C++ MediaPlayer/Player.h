#include <QWidget>
#include <QMediaPlayer>
#include <QMediaPlaylist>

QT_BEGIN_NAMESPACE
class QAbstractItemView;
class QLabel;
class QMediaPlayer;
class QModelIndex;
class QPushButton;
class QSlider;
class QStatusBar;
class QVideoProbe;
class QVideoWidget;
class QAudioProbe;
QT_END_NAMESPACE

class Playlist;

class Player : public QWidget
{
    Q_OBJECT

public:
    explicit Player(QWidget* parent = nullptr);
    ~Player();

    bool playerAvailablity() const;
    void addPlaylist(const QList<QUrl> &urls);
    void audioRole(const QString &role);

signals:
    void fullScreen(bool fullScreen);

private slots:
    void open();
    void duration(qint64 duration);
    void position(qint64 progress);
    void previous();
    void seek(int seconds);
    void jump(const QModelIndex &index);
    void playlistt(int);
    void videoAvailablity(bool available);
    void error();

private:
    void trkInfo(const QString &info);
    void statInfo(const QString &info);
    void durationInfo(qint64 currentInfo);

    QMediaPlayer* player= nullptr;
    QMediaPlaylist* playlist= nullptr;
    QVideoWidget* vidWidget= nullptr;
    QLabel* covLabel= nullptr;
    QSlider* slider= nullptr;
    QLabel* lblDuration= nullptr;
    QPushButton* fullScreenn = nullptr;
    QLabel* statLabel= nullptr;
    QStatusBar* statBar= nullptr;
    QVideoProbe* vidProb= nullptr;
    QAudioProbe* audProb= nullptr;
    Playlist* pllModel= nullptr;
    QAbstractItemView* pllView= nullptr;
    QString trkInf= nullptr;
    QString statInf= nullptr;
    qint64 durationn;
};
