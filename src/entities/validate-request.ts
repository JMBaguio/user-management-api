import { Request, NextFunction } from 'express';
import { Schema } from 'joi';

function validateRequest(req: Request, next: NextFunction, schema: Schema) {
    const options = {
        abortEarly: false, // Include all errors
        allowUnknown: true, // Ignore unknown props
        stripUnknown: true // Remove unknown props
    };

    const { error, value } = schema.validate(req.body, options);
    if (error) {
        next(`Validation error: ${error.details.map(x => x.message).join(', ')}`);
    } else {
        req.body = value;
        next();
    }
}

export { validateRequest };