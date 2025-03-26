import express, { Request, Response, NextFunction } from 'express';
import Joi, { Schema } from 'joi';
import { validateRequest } from './validate-request';
import { createUser } from '../routes/user';
import Roles from './role';

const router = express.Router();

// Routes
router.post('/', createSchema, create);


function create(req: Request, res: Response, next: NextFunction) {
    createUser(req.body)
        .then(() => res.json({ message: 'User created' }))
        .catch(next);
}


// Schema validation functions
function createSchema (req:Request, res:Response, next:NextFunction ) {
  const schema:Schema = Joi.object({
        title: Joi.string().required(),
        firstName: Joi.string().required(),
        lastName: Joi.string().required(),
        role:Joi.string().valid(Roles.Admin,Roles.User).required(),
        email: Joi.string().email().required(),
        password:Joi.string().min(6).required(),
        confirmpassword:Joi.string().valid(Joi.ref('password')).required()
    });
    validateRequest(req, next, schema);
}

export default router;