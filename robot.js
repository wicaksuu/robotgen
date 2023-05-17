const axios = require("axios").default;
const https = require("https");

const agent = new https.Agent({
  rejectUnauthorized: false,
});
async function sendRequest(id, postData) {
  try {
    const url =
      "https://rsud-caruban.madiunkab.go.id/pelayanan_medis/generate_report_penjamin/proses"; // Ganti dengan URL endpoint yang sesuai
    const headers = {
      "Content-Type": "application/x-www-form-urlencoded",
      "User-Agent":
        "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36",
      Cookie:
        "PHPSESSID=50meim9fb8oda65i23klht4biq; ci_session=a%3A6%3A%7Bs%3A10%3A%22session_id%22%3Bs%3A32%3A%224f10092cedadc40fa3f45cd02b8949df%22%3Bs%3A10%3A%22ip_address%22%3Bs%3A9%3A%2210.40.1.1%22%3Bs%3A10%3A%22user_agent%22%3Bs%3A101%3A%22Mozilla%2F5.0%20%28X11%3B%20Linux%20x86_64%29%20AppleWebKit%2F537.36%20%28KHTML%2C%20like%20Gecko%29%20Chrome%2F112.0.0.0%20Safari%2F537.36%22%3Bs%3A13%3A%22last_activity%22%3Bi%3A1684333081%3Bs%3A9%3A%22user_data%22%3Bs%3A0%3A%22%22%3Bs%3A5%3A%22login%22%3Ba%3A12%3A%7Bs%3A7%3A%22user_id%22%3Bs%3A1%3A%229%22%3Bs%3A8%3A%22username%22%3Bs%3A5%3A%22admin%22%3Bs%3A4%3A%22name%22%3Bs%3A13%3A%22ADMINISTRATOR%22%3Bs%3A6%3A%22par_id%22%3Bs%3A1%3A%220%22%3Bs%3A11%3A%22employee_id%22%3Bs%3A3%3A%22484%22%3Bs%3A9%3A%22empcat_id%22%3Bs%3A1%3A%223%22%3Bs%3A10%3A%22user_photo%22%3Bs%3A0%3A%22%22%3Bs%3A8%3A%22password%22%3Bs%3A32%3A%226f7501232ba7dc43229f4a6e74b6bc53%22%3Bs%3A2%3A%22ip%22%3Bs%3A9%3A%2210.40.1.1%22%3Bs%3A3%3A%22mac%22%3Bs%3A17%3A%22b8%3A69%3Af4%3Aa4%3Ada%3A36%22%3Bs%3A12%3A%22employee_nik%22%3Bs%3A12%3A%22123123123123%22%3Bs%3A8%3A%22group_id%22%3Bs%3A2%3A%2243%22%3B%7D%7D2587998c750728b0d45f571ec0a343c9c3adf368",
    };
    const response = await axios.post(url, postData, {
      headers,
      httpsAgent: agent,
    });
    console.log(`Response for ID ${id}:`, response.data);
  } catch (error) {
    console.error(`Error for ID ${id}:`, error.message);
  }
}

async function sendMultipleRequests() {
  const requests = [];
  const postData = [
    {
      id: "1307R0020523V005442",
      data: "px_lap=1307R0020523V005442-1_2_3_4_5_6_7&pertamakali=$number&total_data=0&total_progres=0&jenis_layanan=rj&surety_id=2&dir=bpjs",
    },
    {
      id: "1307R0020523V005402",
      data: "px_lap=1307R0020523V005402-1_2_3_4_5_6_7&pertamakali=$number&total_data=0&total_progres=0&jenis_layanan=rj&surety_id=2&dir=bpjs",
    },
    {
      id: "1307R0020523V005744",
      data: "px_lap=1307R0020523V005744-1_2_3_4_5_6_7&pertamakali=$number&total_data=0&total_progres=0&jenis_layanan=rj&surety_id=2&dir=bpjs",
    },
    {
      id: "1307R0020523V005383",
      data: "px_lap=1307R0020523V005383-1_2_3_4_5_6_7&pertamakali=$number&total_data=0&total_progres=0&jenis_layanan=rj&surety_id=2&dir=bpjs",
    },
    {
      id: "1307R0020523V005673",
      data: "px_lap=1307R0020523V005673-1_2_3_4_5_6_7&pertamakali=$number&total_data=0&total_progres=0&jenis_layanan=rj&surety_id=2&dir=bpjs",
    },
    {
      id: "1307R0020523V005716",
      data: "px_lap=1307R0020523V005716-1_2_3_4_5_6_7&pertamakali=$number&total_data=0&total_progres=0&jenis_layanan=rj&surety_id=2&dir=bpjs",
    },
    {
      id: "1307R0020523V005562",
      data: "px_lap=1307R0020523V005562-1_2_3_4_5_6_7&pertamakali=$number&total_data=0&total_progres=0&jenis_layanan=rj&surety_id=2&dir=bpjs",
    },
    {
      id: "1307R0020523V005352",
      data: "px_lap=1307R0020523V005352-1_2_3_4_5_6_7&pertamakali=$number&total_data=0&total_progres=0&jenis_layanan=rj&surety_id=2&dir=bpjs",
    },
    {
      id: "1307R0020523V005637",
      data: "px_lap=1307R0020523V005637-1_2_3_4_5_6_7&pertamakali=$number&total_data=0&total_progres=0&jenis_layanan=rj&surety_id=2&dir=bpjs",
    },
    {
      id: "1307R0020523V005488",
      data: "px_lap=1307R0020523V005488-1_2_3_4_5_6_7&pertamakali=$number&total_data=0&total_progres=0&jenis_layanan=rj&surety_id=2&dir=bpjs",
    },
  ];

  for (const { id, data } of postData) {
    requests.push(sendRequest(id, data));
  }

  try {
    await Promise.all(requests);
    console.log("All requests completed.");
  } catch (error) {
    console.error("Error occurred during requests:", error);
  }
}

sendMultipleRequests();
