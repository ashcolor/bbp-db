# 大合奏！バンドブラザーズ P 　配信曲リスト

## 必要なソフトウェア

- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.jp/compose/toc.html)
- [Makefile](http://www.gnu.org/software/make/)

## 開発環境構築手順

1. IPに127.0.0.2~127.255.255.254の値を設定して以下のコマンドを実行

    ```bash
    make init IP=127.*.*.*
    ```

2. Macの場合は設定したIPに対して以下のコマンドを実行

    ```bash
    sudo ifconfig lo0 alias 127.*.*.* up
    ```
