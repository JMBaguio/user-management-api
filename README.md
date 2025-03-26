# user-management-api
First Group Project Activity
GROUP A
Leader: Joanna Marie F. Baguio
Members: James Marwin T. Bolongon
         Frank Dweezel D. Gomez
         Glydel R. Villarino

I. PROJECT OVERVIEW: 

- This activity is done to handle user-related (CRUD) operations such as creating, reading, updating and deleting users in the system. It serves as a foundational system for applications that require user authentication, profile management, and data persistence. Built with Node.js and TypeScript, the API follows RESTful principles and uses Express.js as its framework. It uses TypeORM for effective data management and connects with a MySQL database. Git and GitHub branching are used in this project's collaborative development methodology, which enables team members to work on distinct aspects including user creation, retrieval, updating, and deletion.

II. SETUP INSTRUCTIONS
# GITHUB REPOSITORY CLONING
    git clone https://github.com/JMBaguio/user-management-api.git
# USE CLONED REPOSITORY
    cd user-management-api
# INITIALIZE Node.js
    npm init -y
# INSTALL DEPENDENCIES
    npm install express typeorm mysql2 cors bcryptjs

    npm install --save-dev typescript ts-node @types/node @types/express
# UPDATE config.ts WITH YOUR MySQL CREDENTIALS
const config = {
    database: {
        host: process.env.DB_HOST || "localhost",
        port: parseInt(process.env.DB_PORT || "3306"),
        user: process.env.DB_USER || "root",
        password: process.env.DB_PASSWORD || "22643068-b",
        database: process.env.DB_NAME || "node_mysql_crud_api"
    }
} as const;

export default conf