import { AppDataSource } from './db';
import { User } from './user.model';


const userRepository = AppDataSource.getRepository(User);

export async function getUserById(id: number): Promise<User> {
    const user = await userRepository.findOneBy({ id });
    if (!user) throw new Error('User not found');
    return user;
}