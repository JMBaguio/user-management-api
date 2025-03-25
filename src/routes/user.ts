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

const userRepository = AppDataSource.getRepository(User);

export async function deleteUser(id: number): Promise<void> {
    const user = await getUserById(id);
    await userRepository.remove(user);
}

