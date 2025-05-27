import Footer from "./DashboardPages/Components/Footer";
import Header from "./DashboardPages/Components/Header";
import Maryam_Nawaz_CM from "@/assets/adnan.jpg";

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
            Mr. Adnan Afzal Chattha
          </h2>
        </div>
        <div className="h-8" />
      </div>

      <div className="pl-3 pr-3">
        <div className="flex px-32 bg-white p-8 rounded shadow-[2px_4px_10px_rgba(0,0,0,0.15)] mr-4">
          <img
            src={Maryam_Nawaz_CM}
            alt="Maryam Nawaz Sharif"
            className="w-[400px] object-center"
          />
          <div className="px-6 md:px-20 lg:px-28 py-10">
            <p
              className="pr-3 text-3xl md:text-3xl leading-relaxed tracking-wide font-serif text-gray-800"
              style={{
                textAlign: "justify",
                textJustify: "inter-word",
              }}
            >
             Member of the Punjab Assembly, Adnan Afzal Chattha, has been appointed as the Chairman of the Chief Minister's Task Force for Skills Development in Punjab. This task force, established under the directive of Chief Minister Maryam Nawaz Sharif, aims to enhance the capacity of the Skills Development Authority and related institutions.

The task force is expected to play a pivotal role in aligning vocational training programs with market demands, thereby contributing to economic growth and employment opportunities in the province. Under his leadership, the task force is working to reform and modernize the technical education landscape, ensuring that training institutions keep pace with evolving industry requirements.

Mr. Chattha envisions a skills ecosystem where education directly translates to employment and entrepreneurship. His approach focuses on bridging theoretical knowledge with practical expertise, developing industry partnerships, and creating sustainable models for technical training that can be scaled across the province.
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
