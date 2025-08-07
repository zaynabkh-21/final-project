users : id, name, email
posts : id, title, content, user_id (foreign key to users)
comments — id, content, post_id (foreign key to posts), user_id (foreign key to users)
create database blog;
use blog;
create table users (
    id integer primary key,
    name varchar(100) not null,
    email varchar(100) unique not null
);
create table posts (
    id integer primary key,
    title varchar(200) not null,
    content text not null,
    user_id integer references users(id) on delete cascade
);
create table comments (
    id integer primary key,
    content text not null,
    post_id integer references posts(id) on delete cascade,
    user_id integer references users(id) on delete cascade
);

