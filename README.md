# i thought
i_thoughtは感情を日記として投稿するアプリケーションです。

出来事、出来事に対する感情、感情の数値、画像を投稿することができます。

また、他のユーザーの投稿も見ることができます。

キーワード検索、日付での絞り込み検索ができます。

## 開発の背景

### 課題

リモートワークが多く、人と話す機会が少なくなり、自分の感情を出すことが少ない

snsを使うことでも解決できるが、無駄な情報が入ってきやすく、自分の感情をコントロールしにくい

### 解決方法

出来事、出来事に対する感情、感情の数値を日記として記録する

シンプルにすることで、無駄な情報が入らないようにする

## 技術

### フロントエンド

-   Blade
-   Laravel Breeze
-   tailwindcss


### バックエンド

-   PHP
-   Laravel


### DB

-   MySQL


### インフラ
-   AWS s3


## 機能

### 認証機能

Laravel Breezeを使用し、認証機能を実装しました。

ユーザーの登録、ログイン、編集、削除ができます。

#### ユーザー登録


https://github.com/kaitosuzuki-github/i_thought/assets/115347779/fbc38126-a49f-4540-a75d-d36b8014146b


#### ログイン



https://github.com/kaitosuzuki-github/i_thought/assets/115347779/6c752fd4-b477-4938-9afe-1858c6af772f


#### ユーザー編集



https://github.com/kaitosuzuki-github/i_thought/assets/115347779/7a738c03-193c-443d-aa17-7497553d2b2d


#### ユーザー削除



https://github.com/kaitosuzuki-github/i_thought/assets/115347779/f4ae7269-17d0-48c4-8d15-582c723ff1ae


### 投稿機能

出来事、感情、感情の数値、画像(画像は入れなくても投稿できます。)を入れて投稿できます。

新規投稿、編集、削除ができます。

画像の保存先はs3になっており、画像の変更、削除を行った場合は、s3からも削除されるようになっています。

バリデーションもかけています。

また、他のユーザーの投稿も見ることができます。


#### 投稿一覧



https://github.com/kaitosuzuki-github/i_thought/assets/115347779/56d01e43-2899-4e6e-953f-7514fc89f654


#### 新規投稿



https://github.com/kaitosuzuki-github/i_thought/assets/115347779/c818688e-a703-4cce-9404-95dd37547d0b


#### 投稿編集



https://github.com/kaitosuzuki-github/i_thought/assets/115347779/35a786d9-22cf-40f4-a00d-f504adf83b0d


#### 投稿削除



https://github.com/kaitosuzuki-github/i_thought/assets/115347779/6ce91c76-e510-4031-8754-fead0a1849d1


### 検索機能

出来事、感情でのキーワード検索、日付での絞り込み検索を行うことができます。

キーワード検索と日付検索をあわせた検索もできます。

検索に対してバリデーションをかけています。

#### キーワード検索



https://github.com/kaitosuzuki-github/i_thought/assets/115347779/ae16bce1-01b9-4aaa-8cdc-74d935c33ded


#### 日付検索



https://github.com/kaitosuzuki-github/i_thought/assets/115347779/708f24d4-0c02-4137-9b19-6e4e2185d45f


#### キーワード検索と日付検索をあわせた検索



https://github.com/kaitosuzuki-github/i_thought/assets/115347779/a0272197-9400-465c-8484-65b9bc3491de


## ER図
![i_thought_diagram](https://github.com/kaitosuzuki-github/i_thought/assets/115347779/536ce487-ee5d-497b-b81b-e7929e9a37e2)
