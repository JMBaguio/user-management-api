import express, { Request, Response, NextFunction } from 'express';
import Joi, { Schema } from 'joi';
import { validateRequest } from './validate-request';
import { getAllUsers, getUserById, createUser, updateUser, deleteUser } from '../routes/user';
import Roles from './role';

const router = express.Router();

router.get('/:id', getById);

function getById(req: Request, res: Response, next: NextFunction) {
    getUserById(Number(req.params.id))
        .then(user => res.json(user))
        .catch(next);
}




export default router;