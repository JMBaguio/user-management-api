import express, { Request, Response, NextFunction } from 'express';
import {  getUserById,  } from '../routes/user';


const router = express.Router();

router.get('/:id', getById);

function getById(req: Request, res: Response, next: NextFunction) {
    getUserById(Number(req.params.id))
        .then(user => res.json(user))
        .catch(next);
}




export default router;