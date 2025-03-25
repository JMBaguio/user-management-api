import express, { Request, Response, NextFunction } from 'express';
import Joi, { Schema } from 'joi';
import { validateRequest } from './validate-request';
import { getUserById, deleteUser } from '../routes/user';
import Roles from './role';

const router = express.Router();

router.get('/:id', getById);
router.delete('/:id', _delete);


function getById(req: Request, res: Response, next: NextFunction) {
    getUserById(Number(req.params.id))
        .then((user: any) => res.json(user))
        .catch(next);
}

function _delete(req: Request, res: Response, next: NextFunction) {
    deleteUser(Number(req.params.id))
        .then(() => res.json({ message: 'User deleted' }))
        .catch(next);
}

export default router;