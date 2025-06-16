import CardContainer from "@/components/containers/CardContainer";
import CardHeading from "../titles/CardHeading";

const HCard = ({ chart, title, p, className }) => {
  return (
    <CardContainer>
      <CardHeading title={title}>
        <p className="text-xl font-semibold">{p}</p>
      </CardHeading>
      <div className={` w-full rounded-xl bg-card ${className}`}>{chart}</div>
    </CardContainer>
  );
};

export default HCard;
