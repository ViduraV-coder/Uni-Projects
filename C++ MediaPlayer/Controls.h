#include <QMediaPlayer>
#include <QWidget>

QT_BEGIN_NAMESPACE
class QAbstractButton;
class QAbstractSlider;
class QComboBox;
QT_END_NAMESPACE

class Controls : public QWidget
{
    Q_OBJECT

public:
    explicit Controls(QWidget *parent = nullptr);

    QMediaPlayer::State state() const;
    int volume() const;
    bool isMuted() const;
    qreal playbackRate() const;

public slots:
    void setState(QMediaPlayer::State state);
    void setVolume(int volume);
    void setMuted(bool muted);
    void setPlaybackRate(float rate);

signals:
    void play();
    void pause();
    void stop();
    void next();
    void previous();
    void changeVolume(int volume);
    void changeMuting(bool muting);
    void changeRate(qreal rate);

private slots:
    void playClicked();
    void muteClicked();
    void updateRate();
    void onVolumeSliderValueChanged();

private:
    QMediaPlayer::State playState = QMediaPlayer::StoppedState;
    bool playMute = false;
    QAbstractButton* playButton = nullptr;
    QAbstractButton* stopButton = nullptr;
    QAbstractButton* nextButton = nullptr;
    QAbstractButton* prevButton = nullptr;
    QAbstractButton* muteButton = nullptr;
    QAbstractSlider* volSlider = nullptr;
    QComboBox* rateBox = nullptr;
};
