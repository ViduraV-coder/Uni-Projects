QT += quick \
      multimedia \
      multimediawidgets \
      widgets

CONFIG += c++11

DEFINES += QT_DEPRECATED_WARNINGS

SOURCES += main.cpp \
        Controls.cpp \
        Player.cpp \
        Playlist.cpp \
        VideoWidget.cpp \

qnx: target.path = /tmp/$${TARGET}/bin
else: unix:!android: target.path = /opt/$${TARGET}/bin
!isEmpty(target.path): INSTALLS += target

HEADERS += Controls.h \
    Player.h \
    Playlist.h \
    VideoWidget.h

RESOURCES += \
    images.qrc
