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

export async function createUser(params: UserParams): Promise<void> {
    // Check if the user already exists
    const existingUser = await userRepository.findOneBy({ email: params.email });
    if (existingUser) {
        throw new Error(`Email ${params.email} is already registered`);
    }

    // Hash the password
   const passwordHash = await bcrypt.hash(params.password,10)

    // Create a new user
    const user = new User();
    user.email=params.email;
    user.passwordHash = passwordHash;
    user.title = params.title;
    user.firstName = params.firstName;
    user.lastName = params.lastName;
    user.role = params.role;

    await userRepository.save(user)
    console.log('User created successfully');
}
