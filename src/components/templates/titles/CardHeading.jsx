const CardHeading = ({ title, children = <></>, className = "" }) => {
  return (
    <div
      className={`flex justify-between items-center border-b pb-4 ${className} `}
    >
      <h4 className="text-3xl font-bold">{title}</h4>
      {children}
    </div>
  );
};

export default CardHeading;

{
  /* <div className="flex justify-between items-center ">
<h4 className="text-3xl font-bold">Sub Role List</h4>
<Button
  className="bg-cs-primary text-cs-black"
  onClick={() => history.push("/sub-role/add")}
>
  Create New Sub Role
</Button>
</div> */
}
