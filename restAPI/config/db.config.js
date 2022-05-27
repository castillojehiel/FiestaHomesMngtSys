const mysql = require("mysql");

// create here mysql connection

// const dbConn = mysql.createPool({
//   connectionLimit: 100, //important
//   host: "MYSQL5025.site4now.net",
//   user: "a84bb3_fsdb",
//   password: "F19r19d5z",
//   database: "db_a84bb3_fsdb",
//   debug: false,
// });

const dbConn = mysql.createPool({
  connectionLimit: 100, //important
  host: "localhost",
  user: "root",
  password: "",
  database: "fiestahomesdb_live",
  debug: false,
});

// const dbConn = mysql.createPool({
//   host: "MYSQL5030.site4now.net",
//   user: "a83f74_fhlive",
//   password: "JCmssql01",
//   database: "db_a83f74_fhlive",
//   typeCast: function castField(field, useDefaultTypeCasting) {
//     // We only want to cast bit fields that have a single-bit in them. If the field
//     // has more than one bit, then we cannot assume it is supposed to be a Boolean.
//     if (field.type === "BIT") {
//       var bytes = field.buffer();

//       // A Buffer in Node represents a collection of 8-bit unsigned integers.
//       // Therefore, our single "bit field" comes back as the bits '0000 0001',
//       // which is equivalent to the number 1.
//       return bytes[0] === 1 ? true : false;
//     }

//     return useDefaultTypeCasting();
//   },
// });

dbConn.getConnection((err, connection) => {
  if (err) throw err;
  console.log("Database connected successfully");
  connection.release();
});

module.exports = dbConn;

//localhost
// host: 'localhost',
// user: 'root',
// password: '',
// database: 'fiestahomesdb_live',
