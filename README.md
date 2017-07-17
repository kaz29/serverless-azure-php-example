# Serverless Azure PHP Example

このサンプルは、[PHP向けパッチ版 serverless-azure-functions](https://github.com/kaz29/serverless-azure-functions/) を使用して、PHP版の Azure Functionをdeployするサンプルです。

`PHP向けパッチ版 serverless-azure-functions`は、[serverless-azure-functions](https://github.com/serverless/serverless-azure-functions) 元に作成しました。

## Getting started

### 1. Get a Serverless Service and setup project

```bash
npm i -g serverless
npm install
```

### 2. Set up environment variables


```bash
# bash
export azureSubId='<subscriptionId>'
export azureServicePrincipalTenantId='<tenantId>'
export azureServicePrincipalClientId='<servicePrincipalName>'
export azureServicePrincipalPassword='<password>'
```
    
### 3. Deploy
  
```bash
sls deploy
```
