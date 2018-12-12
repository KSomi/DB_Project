
/*
function MYSQL(host, user, pw) {
    this.host = host;
    this.user = user;
    this.password = pw;
    this.port = '3306';
    this.database = 'myproj'; 
}
var sql = require('mysql');

MYSQL.prototype.connect = function(){
    //var sql = require('mysql');
    var connection = sql.createConnection({
        host: this.host,
        user: this.user,
        password: this.pw,
        port: this.port,
        database: this.database
    });
    connection.connect();
    
    return connection;
}

MYSQL.prototype.searchData = function(connection, sql){
    
    connection.query(sql, function(err, rows, fields){
        if(!err){
            console.log('The result is: ', rows);
            return rows;}
        else
            console.log('Error', err);
    });
    
}

MYSQL.prototype.closeCon = function(connection){
    connection.end();
}

*/


var mysql = require('mysql');
var con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: 'root'
});

con.connect(function(err){
    if(err) throw err;
    console.log("connected");
});