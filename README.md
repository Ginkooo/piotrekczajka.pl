# piotrekczajka.pl
Sources of my blog

HOW TO RUN THIS
===============
To be able to use database, you should create tables like:

```
users {
username: string,
password: string (bcrypted password, 10 counr),
real_name: string
}
```

Then provide correct CONNECTION STRING in config.php file.

Finally go to public_html directory and execute

`php -S localhost:8000`
