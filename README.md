# sam local start-api Container Image Volume Mount Example

This demos a hacky way to get around SAM CLI's current shortfall with volume mounts.

1. Spin up your function with docker or docker compose.  Make sure it has the [Lambda Runtime Interface Emulator](https://github.com/aws/aws-lambda-runtime-interface-emulator).
2. Use a proxy function to call your function.  

```
docker-compose up
sam local start-api --parameter-overrides HostIP=<Your Host IP>
```
