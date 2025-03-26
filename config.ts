
const config = {
    database: {
        host: process.env.DB_HOST || "localhost",
        port: parseInt(process.env.DB_PORT || "3306"),
        user: process.env.DB_USER || "root",
        password: process.env.DB_PASSWORD || "22643068-b",
        database: process.env.DB_NAME || "node_mysql_crud_api"
    }
} as const;

export default config;