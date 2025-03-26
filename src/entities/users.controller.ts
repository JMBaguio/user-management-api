import express, { Request, Response, NextFunction } from 'express';
import Joi, { Schema } from 'joi';

import {  createUser, deleteUser, getUserById } from '../routes/user';
import { validateRequest } from './validate-request';
import Roles from './role';

const router = express.Router();

// Create User
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

// Delete user by Id
router.delete('/:id', _delete);

function _delete(req: Request, res: Response, next: NextFunction) {
    deleteUser(Number(req.params.id))
        .then(() => res.json({ message: 'User deleted' }))
        .catch(next);
}

//Get User by Id
router.get('/:id', getById);

function getById(req: Request, res: Response, next: NextFunction) {
    getUserById(Number(req.params.id))
        .then(user => res.json(user))
        .catch(next)
} 

export default router;