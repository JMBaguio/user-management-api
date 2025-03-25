
const config = {
    database: {
        host: process.env.DB_HOST || "localhost",
        port: parseInt(process.env.DB_PORT || "3306"),
        user: process.env.DB_USER || "root",
        password: process.env.DB_PASSWORD || "James123#",
        database: process.env.DB_NAME || "node-mysql-crud-api"
    }
} as const;

export default config;