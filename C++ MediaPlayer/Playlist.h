#include <QAbstractItemModel>
#include <QScopedPointer>

QT_BEGIN_NAMESPACE
class QMediaPlaylist;
QT_END_NAMESPACE

class Playlist : public QAbstractItemModel
{
    Q_OBJECT

public:
    enum Column
    {
        Title = 0,
        ColumnCount
    };

    explicit Playlist(QObject* parent = nullptr);
    ~Playlist();
    int rowCount(const QModelIndex &parent = QModelIndex()) const override;
    int columnCount(const QModelIndex &parent = QModelIndex()) const override;
    QModelIndex index(int row, int column, const QModelIndex &parent = QModelIndex()) const override;
    QModelIndex parent(const QModelIndex &child) const override;
    QVariant data(const QModelIndex &index, int role = Qt::DisplayRole) const override;
    QMediaPlaylist* playlist() const;
    void setPlaylist(QMediaPlaylist* playlist);
    bool setData(const QModelIndex &index, const QVariant &value, int role = Qt::DisplayRole) override;

private slots:
    void beginInsert(int start, int end);
    void endInsert();
    void beginRemove(int start, int end);
    void endRemove();
    void change(int start, int end);

private:
    QScopedPointer<QMediaPlaylist> pll;
    QMap<QModelIndex, QVariant> dt;
};
