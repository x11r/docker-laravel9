# 目的
Docker-compose上で、PHP-8 + Laravel9 ( + Nginx + MySQL) の雛形を作ってみる。
フロントエンドは後回し。

# ついでに欲しい物。
- MySQL
- Xdebug
- opcache
- apcu
- MinIO (ローカルAWS S3)
- supervisor

Redisは適宜入れてみる。

# 今後の展開
値を共通化して、便利に環境を作れるようにしたい。  
-> envsubst コマンドを上手に利用してなんとかできるようになった。
