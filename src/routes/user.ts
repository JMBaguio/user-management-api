import { AppDataSource } from './db';
import { User } from './user.model';
import bcrypt from 'bcryptjs';

interface UserParams {
    email: string;
    password: string;
    title: string;
    firstName: string;
    lastName: string;
    role: string;
}