This is about simple chat apllication by using mysql,php,ajax,jquery.

in this tutorial iam using XAMP appication.

Cource setup:
XAMP application and  php IDE.


Entering into the Project:

database and tables setup:
--------------------------
	craete database:
		create  database user_chat;
	create users table in the user_chat database:
		create table user_chat(id not null auto_increment primary key,
								username varchar(256) not null unique,
								fullname varchar(256) not null,
								email varchar(256) not null,
								password varchar(256) not null
								);

	create messages table in the user_chat database:
		create table messages(username varchar(236) not null,
							 message varchar(256) not null,
							 ttime timestamp default current_timestamp,
							 sender varchar(256) not null
							 );

All required files are preset in the directory please refer.