import 'reflect-metadata';
import { DataSource } from 'typeorm';
import config from '../../config';
import { User } from './user.model';

interface DatabaseConfig {
    host: string;
    port: number;
    user: string;
    password: string;
    database: string;
}

const { host, port, user, password, database } = config.database as DatabaseConfig;


export const AppDataSource = new DataSource({
    type: 'mysql',
    host,
    port,
    username: user,
    password,
    database,
    synchronize: true, 
    logging: true,
    entities: [User],
    subscribers: [],
    migrations: [],
});

AppDataSource.initialize()
    .then(() => {
        console.log('Database connection established successfully');
    })
    .catch((err) => {
        console.error('Failed to connect to the database:', err);
    });