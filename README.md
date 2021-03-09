# sam local start-api Container Image Volume Mount Example

This demos a hacky way to get around SAM CLI's current shortfall with volume mounts.

1. Spin up your function with docker or docker compose.  Make sure it has the [Lambda Runtime Interface Emulator](https://github.com/aws/aws-lambda-runtime-interface-emulator).
2. Use sam to spin up a proxy to call your function.
3. Use template.prod.yaml for deployments and to spin up your function without mount.

Mount volumes however you need to in your docker-compose file.

```
docker-compose up
sam local start-api --parameter-overrides HostIP=<Your Host IP>
```

### Read Only

Note, it's best to mount all volumes as readonly except for a mount to `/tmp` to replicate Lambda.
