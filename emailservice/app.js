const express = require('express');
const bodyParser = require('body-parser');
const cors = require('cors');
const config = require('./config');

const app = express();
app.use(bodyParser.json());
app.use(cors());

app.post('/usuario', (req, res) => {
    console.log(req.body)
    config(req.body);
    res.status(200).send();
})
app.listen(8000, () => {
console.log('Server running')
});