import CardContainer from "../../containers/CardContainer";

const SmallCard = ({ txt, total }) => {
  return (
    <CardContainer className="">
      <div className="bg-card text-3xl font-bold  rounded-3xl w-full space-y-5">
        <h2 className="text-nowrap  ">{txt}</h2>
        <p className="text-[2rem] text-text-primary font-bold">{total}</p>
      </div>
    </CardContainer>
  );
};

export default SmallCard;
