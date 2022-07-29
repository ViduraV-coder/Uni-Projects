#include "Playlist.h"
#include <QFileInfo>
#include <QUrl>
#include <QMediaPlaylist>

Playlist::Playlist(QObject *parent)
    : QAbstractItemModel(parent)
{
}

Playlist::~Playlist()
{
}

int Playlist::rowCount(const QModelIndex &parent) const
{
    return pll && !parent.isValid() ? pll->mediaCount() : 0;
}

int Playlist::columnCount(const QModelIndex &parent) const
{
    return !parent.isValid() ? ColumnCount : 0;
}

QModelIndex Playlist::index(int row, int column, const QModelIndex &parent) const
{
    return pll && !parent.isValid()
            && row >= 0 && row < pll->mediaCount()
            && column >= 0 && column < ColumnCount
        ? createIndex(row, column)
        : QModelIndex();
}

QModelIndex Playlist::parent(const QModelIndex &child) const
{
    Q_UNUSED(child);

    return QModelIndex();
}

QVariant Playlist::data(const QModelIndex &index, int role) const
{
    if (index.isValid() && role == Qt::DisplayRole) {
        QVariant value = dt[index];
        if (!value.isValid() && index.column() == Title) {
            QUrl location = pll->media(index.row()).canonicalUrl();
            return QFileInfo(location.path()).fileName();
        }

        return value;
    }
    return QVariant();
}

QMediaPlaylist* Playlist::playlist() const
{
    return pll.data();
}

void Playlist::setPlaylist(QMediaPlaylist* playlist)
{
    if (pll) {
        disconnect(pll.data(), &QMediaPlaylist::mediaAboutToBeInserted, this, &Playlist::beginInsert);
        disconnect(pll.data(), &QMediaPlaylist::mediaInserted, this, &Playlist::endInsert);
        disconnect(pll.data(), &QMediaPlaylist::mediaAboutToBeRemoved, this, &Playlist::beginRemove);
        disconnect(pll.data(), &QMediaPlaylist::mediaChanged, this, &Playlist::change);
    }

    beginResetModel();
    pll.reset(playlist);

    if (pll) {
        connect(pll.data(), &QMediaPlaylist::mediaAboutToBeInserted, this, &Playlist::beginInsert);
        connect(pll.data(), &QMediaPlaylist::mediaInserted, this, &Playlist::endInsert);
        connect(pll.data(), &QMediaPlaylist::mediaAboutToBeRemoved, this, &Playlist::beginRemove);
        connect(pll.data(), &QMediaPlaylist::mediaRemoved, this, &Playlist::endRemove);
        connect(pll.data(), &QMediaPlaylist::mediaChanged, this, &Playlist::change);
    }

    endResetModel();
}

bool Playlist::setData(const QModelIndex &index, const QVariant &value, int role)
{
    Q_UNUSED(role)
    dt[index] = value;
    emit dataChanged(index, index);
    return true;
}

void Playlist::beginInsert(int start, int end)
{
    dt.clear();
    beginInsertRows(QModelIndex(), start, end);
}

void Playlist::endInsert()
{
    endInsertRows();
}

void Playlist::beginRemove(int start, int end)
{
    dt.clear();
    beginRemoveRows(QModelIndex(), start, end);
}

void Playlist::endRemove()
{
    endInsertRows();
}

void Playlist::change(int start, int end)
{
    dt.clear();
    emit dataChanged(index(start,0), index(end,ColumnCount));
}
