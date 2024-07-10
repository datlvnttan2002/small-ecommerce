
console.log(12)

new CallApi(route("api.user.index")).all((res)=>{
    console.log(res)
})