import express, { response } from "express";
import { PORT, mongoDBURL } from "./config.js";
import mongoose from 'mongoose';
import { Book } from './models/bookModel.js';
import booksRoute from './routes/booksRoute.js';
import cors from 'cors';

const app = express();

//Middleware for parsing request body to postMan API server
app.use(express.json());

//Middleware for handling CORS POLICY

//Option 1: Allow All Origins with Default of Cors(*)
app.use(cors());

//Option 2: Allow Custom Origins
// app.use(
//     cors({
//         origin: 'htt[://localhost:3000',
//         method: ['GET', 'POST', 'PUT', 'DELETE'],
//         allowedHeaders: ['Content-Type'],
//     })
// );

//creating root
app.get('/', (request, responce) => {
    console.log(request);
    return responce.status(234).send('Welcome!!');
});

//middleWare
app.use('/books',booksRoute);

//connect with Data Base
mongoose.connect(mongoDBURL).then(() => {
    console.log('App connected to database!!');
    app.listen(PORT, () => {
        console.log(`App is running at port: ${PORT}`);
    });
}).catch((error) => {
    console.log(error);
});