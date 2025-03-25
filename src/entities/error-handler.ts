import { Request, Response, NextFunction } from 'express';

// Error handler middleware
const errorHandler = (err: any, req: Request, res: Response, next: NextFunction): Response<any> | void => {
    if (err instanceof Error) {
        // Handle application errors or caught exceptions
        const statusCode = err['statusCode'] || 500;  // If you have a custom status code
        const message = err.message || 'Internal Server Error';

        // Log the error for debugging purposes
        console.error(err);

        return res.status(statusCode).json({ message });
    }

    if (typeof err === 'string') {
        // Custom application error
        const is404 = err.toLowerCase().endsWith('not found');
        const statusCode = is404 ? 404 : 400;

        return res.status(statusCode).json({ message: err });
    }

    // Fallback to generic error response
    return res.status(500).json({ message: err.message || 'Internal Server Error' });
}

export default errorHandler;
