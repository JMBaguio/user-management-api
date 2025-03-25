import express, { Request, Response, NextFunction } from 'express';
import Joi, { Schema } from 'joi';
import { validateRequest } from './validate-request';
import { deleteUser } from '../routes/user';
import Roles from './role';

const router = express.Router();

// Route
router.delete('/:id', _delete);

function _delete(req: Request, res: Response, next: NextFunction) {
    deleteUser(Number(req.params.id))
        .then(() => res.json({ message: 'User deleted' }))
        .catch(next);
}

export default router;