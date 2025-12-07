テーマ「blog」2025/07/25版

■ テーマで読み込まれていないincludeファイル
- thumbnail.htmlはエントリー一覧を大きめの画像付きで表示するテンプレートです。エントリーの一覧を出したい時などに使用されることを想定しています。
- entry-summary.htmlは画像のないエントリー一覧を表示するテンプレートです。エントリーをリストのように表示させたい時などに使用されることを想定しています。

ご使用の際はモジュールIDを指定してください。


■ コメント機能
コメント機能を有効にした場合は、
_entry.html内 に /admin/comment/edit.html と /include/comment.html を読み込んでください。


■ 管理ページ > コンフィグで直接設定されているモジュール
■■ Entry_Body のおすすめ設定
サイズ：178×100
トリミング：チェック
フィールド基本設定 ユーザー情報：チェック
　　　　　　　　　 ブログ情報　：チェック
カスタムフィールド ユーザーフィールド：チェック
　　　　　　　　　 ブログフィールド　：チェック

■■ Entry_Tagrelational のおすすめ設定
表示件数：8
ループ親クラス：acms-g-cols-2 acms-g-cols-sm-3 acms-g-cols-md-4
ノーイメージ：チェック
サイズ：178×100（16:9で指定）
トリミング：チェック
フィールド基本設定 ブログ情報：チェック
カスタムフィールド ブログフィールド：チェック

■■ Links のおすすめ設定
トップ　%{HTTP_ROOT}
このブログについて　/about.html
を設定し、about.html というエントリーがなければ作成する。


■ entry-body-index.html
<div class="summary"> に下記のようにクラス名を追加することで、見せ方を変更することができます。
・summary is-thumbnail-1column ...  1カラムで表示します。概要文あり。
・summary is-thumbnail-2column ... 2カラムで表示します。概要文なし。
・summary ... PCでの見せ方に寄せたデザインです。概要文なし。

クラス名を以下のようにすることで、スマートフォン幅の時の見せ方を変更することができます。
・summary is-thumbnail-1column-sp ...  1カラムで表示します。概要文あり。
・summary is-thumbnail-2column-sp ... 2カラムで表示します。概要文なし。
