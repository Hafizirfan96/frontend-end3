import Footer from "./DashboardPages/Components/Footer";
import Header from "./DashboardPages/Components/Header";
import Maryam_Nawaz_CM from "@/assets/Maryam_Nawaz.png";

const ProfileDetail = () => {
  return (
    <div>
      <Header />
      <div className="Browse bg-[#478e51] mb-8">
        <div className="h-5" />
        <div className="flex items-center">
          <div className=" ml-16">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 512 512"
              fill="#e2e028ed"
              className="w-12 h-12"
            >
              <path d="M16 128h416c8.8 0 16-7.2 16-16V48c0-8.8-7.2-16-16-16H16C7.2 32 0 39.2 0 48v64c0 8.8 7.2 16 16 16zm480 80H80c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16h416c8.8 0 16-7.2 16-16v-64c0-8.8-7.2-16-16-16zm-64 176H16c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16h416c8.8 0 16-7.2 16-16v-64c0-8.8-7.2-16-16-16z" />
            </svg>
          </div>
          <h2 className="text-light text-[20px] text-bold ml-3 text-white BrowseTitle">
             Maryam Nawaz Sharif, Chief Minister Punjab
          </h2>
        </div>
        <div className="h-8" />
      </div>

      <div className="pl-3 pr-3">
        <div className="flex px-32 bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4">
          <img
            src={Maryam_Nawaz_CM}
            alt="Maryam Nawaz Sharif"
            className=" object-center"
          />
          <div className="px-6 md:px-20 lg:px-28 py-10">
            <p
              className="pr-3 text-3xl md:text-3xl leading-relaxed tracking-wide font-serif text-gray-800"
              style={{
                textAlign: "justify",
                textJustify: "inter-word",
              }}
            >
              Chief Minister Punjab Maryam Nawaz Sharif envisions transforming
              the province into a hub of skilled talent, innovation, and
              economic prosperity. With her dynamic leadership and unwavering
              commitment to progress, she has established the Skills Development
              & Entrepreneurship (SD&E) Department to empower diverse
              communities through inclusive and future-ready skill development
              programs. These initiatives encompass international labor
              placement, transgender skill training, rural women’s empowerment,
              and specialized programs designed to bridge skill gaps and foster
              entrepreneurship. Under her visionary guidance, Punjab is paving
              the way for a skilled, self-reliant, and economically vibrant
              future.
            </p>
          </div>
        </div>

        <div className="box-shadow-web bg-white p-4 mt-8"></div>
      </div>
      <Footer />
    </div>
  );
};

export default ProfileDetail;
