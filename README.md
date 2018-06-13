# Run at local
```
$ docker build . -t react-chat
$ docker run -d -p 8888:8080 --name react-chat  react-chat
```

# Publish by ngrok
### install ngrok
https://ngrok.com/download
### Connect your account
```bash
$ ./ngrok authtoken <YOUR_AUTH_TOKEN>
```
### run ngrok
```
$ ngrok tcp 8888
```