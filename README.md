# Run at local
```
$ docker build . -t react-chat
$ docker run -d -p 8888:8080 --name react-chat  react-chat
```

# Publish by ngrok
1. install ngrok
https://ngrok.com/download
1. Connect your account
```bash
$ ./ngrok authtoken <YOUR_AUTH_TOKEN>
```
1. ngrok tcp 8888