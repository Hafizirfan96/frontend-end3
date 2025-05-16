
const Circle = ({ active }) => (
    <div
      className={`inline-block w-10 h-10 rounded-full ${
        active ? "bg-green-800" : "bg-red-800"
      }`}
    ></div>
  );

export default Circle