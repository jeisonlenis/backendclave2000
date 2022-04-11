const nodemailer = require('nodemailer');
module.exports = (cliente) => {

    console.log(cliente);

    const {
        modelo,
        nombre_completo,
        numero_celular,
        email,
        departamento,
        ciudad,
        fechacreacion,
        horacreacion,
    } = cliente;


    var transporter = nodemailer.createTransport({
        service: 'gmail',
        auth: {
            user: 'pruebaclave2000@gmail.com',
            pass: 'clave20002022'
        }
    });
    const mailOptions = {
        from: `${email}`,
        to: 'jaguilar@processoft.com.co, jcastro@processoft.com.co, mahernandez@processoft.com.co',
        subject: `Cotizacion dia ${fechacreacion}`,
        html: `
        <h1>Prueba tecnica Clave 2000 Jeisson Lenis Marulanda</h1>
        <strong>Modelo:</strong> ${modelo} <br/>
        <br/>
        <strong>Nombre:</strong> ${nombre_completo} <br/>
        <br/>
        <strong>Email:</strong> ${email}<br/>
        <br/>
        <strong>Numero de celular:</strong> ${numero_celular}<br/>
        <br/>
        <strong>Ciudad:</strong> ${ciudad} <br/>
        <br/>
        <strong>Departamento:</strong> ${departamento}<br/>
        <br/>
        <strong>Fecha de solicitud:</strong> ${fechacreacion}<br/>
        <br/>
        <strong>Hora de solicitud:</strong> ${horacreacion} <br/>
        <br/>
        <strong>E-mail:</strong> ${email}<br/>
`
    };
    transporter.sendMail(mailOptions, function (err, info) {
        if (err)
            console.log(err)
        else
            console.log(info);
    });
}