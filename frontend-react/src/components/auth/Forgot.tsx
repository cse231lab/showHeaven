interface Props {}
 
function Forgot(props: Props): JSX.Element {
  return (
    <>
    <div className="d-flex justify-content-center ">
      
     <div className="bg-light shadow-lg mt-5 mb-5 p-3 d-flex flex-column  align-items-start w-25  ">
      
      <h3 className="">New Password:</h3>
      <input type="text" className="form-control mt-1 "/>
      <h3 className="">Retype Password:</h3>
      <input type="text" className="form-control mt-1 "/>
      <button className=" mt-3 btn btn-dark">Submit</button>

    </div>

    <div className="bg-light  shadow-lg mt-5 mb-5 ps-3 d-flex flex-column w-25 justify-content-center align-items-start  border border-5 border-dark ">
      
       <div className="d-flex align-items-start  ">
        <h3 className="fs-2 w-50">Handle: </h3>
        <h4 className="ms-3 align-self-center fs-2">sarwar450</h4>
       </div>
       <div className="d-flex align-items-start ">
        <h3 className="fs-2">Email: </h3>
        <h4 className="ms-3 align-self-center fs-2 ">sarwar@gmail.com</h4>
       </div>

    </div>


    </div>
    </>
  );
}
 
export default Forgot;