import express from 'express';
import cors from 'cors';
import errorHandler from './entities/error-handler';
import userRoutes from './entities/users.controller';
import { AppDataSource } from './routes/db'; // Ensure this path is correct

const app = express();

app.use(express.json());
app.use(express.urlencoded({ extended: true }));
app.use(cors());

// Ensure database is initialized before handling requests
AppDataSource.initialize()
    .then(() => {
        console.log('Database connection established successfully');
    })
    .catch((err: Error) => {
        console.error('Failed to connect to the database:', err);
    });

// API routes
app.use('/users', userRoutes);

// Global error handler
app.use(errorHandler);

// Start server
const port = process.env.NODE_ENV === 'production' ? (process.env.PORT || 80) : 4000;
app.listen(port, () => console.log(`Server listening on port ${port}`));

export default app;