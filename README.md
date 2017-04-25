# RpiIonWallet
Raspberry Pi Ion Wallet Web Interface  

ION DONATE: `iTfjqQrW1NJayiguWGo2L38s3wCFwvaTRa`  

Setup
```
sudo su
apt-get update
apt-get install nginx php5-cli php5-fpm php5-curl git
cd /usr/share/nginx/www/
git pull https://github.com/JSponaugle/RpiIonWallet.git .
```

Edit your nginx default config `/etc/nginx/sites-enabled/default`

```
server {
        #listen   80; ## listen for ipv4; this line is default and implied
        #listen   [::]:80 default_server ipv6only=on; ## listen for ipv6

        root /usr/share/nginx/www;
        index index.php index.html index.htm;

        # Make site accessible from http://localhost/
        server_name localhost;

        location / {
                try_files $uri $uri/ /index.php;
        }
        location ~ \.php$ {
                fastcgi_split_path_info ^(.+\.php)(/.+)$;
                fastcgi_pass unix:/var/run/php5-fpm.sock;
                fastcgi_index index.php;
                include fastcgi_params;
        }
}
```

Restart Nginx
```
service nginx restart
service php5-fpm restart
```


Edit your `~/.ionomy/ion.conf`
```
rpcuser=ionrpc
rpcpassword={{{ChangePass}}}
rpcport=58273
server=1
daemon=1
listen=1
```

Place info into `coins.php`

Setup Crontab
`* * * * * php (dirtowebinterface)/grabmndp.php >> /dev/null 2>&1`
`@reboot iond`

visit `http://localhost/` on rpi