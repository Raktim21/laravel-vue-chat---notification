const express = require('express');
const app = express();
const server = require('http').createServer(app);
const io = require('socket.io')(server,{
    cors: {
        origin: "*",
        methods: ['GET', 'POST'],
        allowedHeaders: ['Content-Type'],
        credentials: true,
    }
});

io.on('connection', (socket) => {
    socket.on('user-connected', (userId) => {
        connectedUsers.set(socket.id, userId);
    });

    socket.on('send-message', (message) => {
        const userId = connectedUsers.get(socket.id);
        socket.to(userId).emit('new-message', message);
    });

    socket.on('disconnect', () => {
        connectedUsers.delete(socket.id);
    });
});

const port = process.env.PORT || 3000;
server.listen(port, () => {
//   console.log(`Server running at http://localhost:${port}`);
});