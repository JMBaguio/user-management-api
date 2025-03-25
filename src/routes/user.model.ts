import { Entity, PrimaryGeneratedColumn, Column, CreateDateColumn, UpdateDateColumn } from 'typeorm';

@Entity()
export class User {
    @PrimaryGeneratedColumn()
    id!: number; // Definite assignment assertion

    @Column({ unique: true })
    email?: string;

    @Column()
    passwordHash?: string;

    @Column()
    title?: string;

    @Column()
    firstName?: string;

    @Column()
    lastName?: string;

    @Column()
    role?: string;

    @CreateDateColumn()
    createdAt?: Date;

    @UpdateDateColumn()
    updatedAt?: Date;
}