<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $desc = '
            <ul>
                            <li>
                                <p>
                                Rau củ chứa rất nhiều vitamin và chất dinh dưỡng nên mang đến
                                rất nhiều lợi ích cho sức khỏe con người.&nbsp;
                                </p>
                            </li>
                            <li>
                                <p>Hỗ trợ giảm cân</p>
                            </li>
                            <li>
                                <p>
                                Giảm nguy cơ mắc các bệnh về tim mạch, béo phì và cả ung thư
                                </p>
                            </li>
                            <li>
                                <p>Tăng cường sức đề kháng của cơ thể</p>
                            </li>
                            <li>
                                <p>Cải thiện thị lực</p>
                            </li>
                            <li>
                                <p>Điều hòa đường huyết</p>
                            </li>
                            <li>
                                <p>Giảm cholesterol trong máu</p>
                            </li>
                            <li>
                                <p>Điều hòa huyết áp</p>
                            </li>
                        </ul>
                        <p>
                            <br />
                            <strong>Cách chọn rau củ tươi ngon</strong>
                        </p>
                        <ul>
                            <li>
                                <p>
                                Dựa vào hình dáng bên ngoài: Nên ưu tiên chọn các loại rau củ
                                có phần vỏ không có các vết sâu, cuống lá không bị nhũn, thâm
                                đen. Tránh chọn những loại quả có vẻ ngoài to tròn, căng lớn,
                                bởi đây có thể là những quả đã bị tiêm thuốc, không an toàn
                                cho sức khỏe.
                                </p>
                            </li>
                            <li>
                                <p>
                                Dựa vào màu sắc: Màu sắc của các loại rau củ thường tươi mới,
                                không có các vết xước, héo hay quá đậm màu. Các loại củ có màu
                                quá xanh hoặc quá bóng sẽ không hẳn là an toàn cho sức khỏe
                                người dùng.
                                </p>
                            </li>
                            <li>
                                <p>
                                Dựa vào mùi hương: Mùi hương tự nhiên của các loại rau củ sẽ
                                là mùi đặc trưng theo từng loại chứ không phải là mùi hắc,
                                nồng khó chịu. Nếu các loại củ bạn đang chọn có mùi hóa chất
                                hãy ngưng sử dụng ngay.
                                </p>
                            </li>
                            <li>
                                <p>
                                Dựa vào cảm nhận khi cầm: Những loại củ quả cầm chắc tay, kích
                                thước vừa phải, không quá to sẽ thường ngon hơn những loại to
                                lớn nhưng khối lượng nhẹ. Một số loại rau củ bạn chỉ nên chọn
                                những quả nhỏ, đều tay sẽ ngon hơn.
                                </p>
                            </li>
                        </ul>
        ';

        // $img = "assets/users/image/featured/";
        $img = "storage/uploads/2026/01/05/";

        // $categoryIds = DB::table('categories')->pluck('id');

        $products =[
            [
                "name" => "Thịt bò tươi",
                "img" => $img.'beef_update1.jpg',
                "description" => $desc,
                "sort_description" => "Fruité Garden – nơi bạn tìm thấy thực phẩm chuẩn sạch, chất lượng và bảo quản đúng cách. Chăm sóc sức khỏe từ những điều giản dị, bắt đầu từ nguồn thực phẩm tươi mới mỗi ngày. “Fruité Garden – Fresh, Clean, and Naturally Delicious.”",
                "price" => 240000,
                "inventory" => 20,
                "facebook" => "abc",
                "instagram" => "abc",
                "linkedin" => "abc",
                "twitter" => "abc",
                "category_id" => 1,
            ],
            [
                "name" => "Thịt nạt heo",
                "img" => $img.'pork_update1.jpg',
                "description" => $desc,
                "sort_description" => "Fruité Garden – nơi bạn tìm thấy thực phẩm chuẩn sạch, chất lượng và bảo quản đúng cách. Chăm sóc sức khỏe từ những điều giản dị, bắt đầu từ nguồn thực phẩm tươi mới mỗi ngày. “Fruité Garden – Fresh, Clean, and Naturally Delicious.”",
                "price" => 175000,
                "inventory" => 30,
                "facebook" => "abc",
                "instagram" => "abc",
                "linkedin" => "abc",
                "twitter" => "abc",
                "category_id" => 1,
            ], 
            [
                "name" => "Thịt gà",
                "img" => $img.'chicken-update1.jpg',
                "description" => $desc,
                "sort_description" => "Fruité Garden – nơi bạn tìm thấy thực phẩm chuẩn sạch, chất lượng và bảo quản đúng cách. Chăm sóc sức khỏe từ những điều giản dị, bắt đầu từ nguồn thực phẩm tươi mới mỗi ngày. “Fruité Garden – Fresh, Clean, and Naturally Delicious.”",
                "price" => 65000,
                "inventory" => 40,
                "facebook" => "abc",
                "instagram" => "abc",
                "linkedin" => "abc",
                "twitter" => "abc",
                "category_id" => 1,
            ],
            [
                "name" => "Thịt bò tươi",
                "img" => $img.'beef_update1.jpg',
                "description" => $desc,
                "sort_description" => "Fruité Garden – nơi bạn tìm thấy thực phẩm chuẩn sạch, chất lượng và bảo quản đúng cách. Chăm sóc sức khỏe từ những điều giản dị, bắt đầu từ nguồn thực phẩm tươi mới mỗi ngày. “Fruité Garden – Fresh, Clean, and Naturally Delicious.”",
                "price" => 240000,
                "inventory" => 20,
                "facebook" => "abc",
                "instagram" => "abc",
                "linkedin" => "abc",
                "twitter" => "abc",
                "category_id" => 1,
            ],
            [
                "name" => "Cá thu tươi sống",
                "img" => $img.'mackerelfish-update1.jpg',
                "description" => $desc,
                "sort_description" => "Fruité Garden – nơi bạn tìm thấy thực phẩm chuẩn sạch, chất lượng và bảo quản đúng cách. Chăm sóc sức khỏe từ những điều giản dị, bắt đầu từ nguồn thực phẩm tươi mới mỗi ngày. “Fruité Garden – Fresh, Clean, and Naturally Delicious.”",
                "price" => 145000,
                "inventory" => 20,
                "facebook" => "abc",
                "instagram" => "abc",
                "linkedin" => "abc",
                "twitter" => "abc",
                "category_id" => 1,
            ],
            [
                "name" => "Cá hồi phi lê",
                "img" => $img.'salmonfish-update1.jpg',
                "description" => $desc,
                "sort_description" => "Fruité Garden – nơi bạn tìm thấy thực phẩm chuẩn sạch, chất lượng và bảo quản đúng cách. Chăm sóc sức khỏe từ những điều giản dị, bắt đầu từ nguồn thực phẩm tươi mới mỗi ngày. “Fruité Garden – Fresh, Clean, and Naturally Delicious.”",
                "price" => 90000,
                "inventory" => 20,
                "facebook" => "abc",
                "instagram" => "abc",
                "linkedin" => "abc",
                "twitter" => "abc",
                "category_id" => 1,
            ],
            [
                "name" => "Chuối",
                "img" => $img.'banana-update1.jpg',
                "description" => $desc,
                "sort_description" => "Fruité Garden – nơi bạn tìm thấy thực phẩm chuẩn sạch, chất lượng và bảo quản đúng cách. Chăm sóc sức khỏe từ những điều giản dị, bắt đầu từ nguồn thực phẩm tươi mới mỗi ngày. “Fruité Garden – Fresh, Clean, and Naturally Delicious.”",
                "price" => 25000,
                "inventory" => 20,
                "facebook" => "abc",
                "instagram" => "abc",
                "linkedin" => "abc",
                "twitter" => "abc",
                "category_id" => 2,
            ],
            [
                "name" => "Táo",
                "img" => $img.'apple-update1.jpg',
                "description" => $desc,
                "sort_description" => "Fruité Garden – nơi bạn tìm thấy thực phẩm chuẩn sạch, chất lượng và bảo quản đúng cách. Chăm sóc sức khỏe từ những điều giản dị, bắt đầu từ nguồn thực phẩm tươi mới mỗi ngày. “Fruité Garden – Fresh, Clean, and Naturally Delicious.”",
                "price" => 59000,
                "inventory" => 20,
                "facebook" => "abc",
                "instagram" => "abc",
                "linkedin" => "abc",
                "twitter" => "abc",
                "category_id" => 2,
            ],
            [
                "name" => "Lê Hàn Quốc",
                "img" => $img.'pear-update1.jpg',
                "description" => $desc,
                "sort_description" => "Fruité Garden – nơi bạn tìm thấy thực phẩm chuẩn sạch, chất lượng và bảo quản đúng cách. Chăm sóc sức khỏe từ những điều giản dị, bắt đầu từ nguồn thực phẩm tươi mới mỗi ngày. “Fruité Garden – Fresh, Clean, and Naturally Delicious.”",
                "price" => 160000,
                "inventory" => 20,
                "facebook" => "abc",
                "instagram" => "abc",
                "linkedin" => "abc",
                "twitter" => "abc",
                "category_id" => 2,
            ],
            [
                "name" => "Dưa hấu",
                "img" => $img.'watermelon-update1.jpg',
                "description" => $desc,
                "sort_description" => "Fruité Garden – nơi bạn tìm thấy thực phẩm chuẩn sạch, chất lượng và bảo quản đúng cách. Chăm sóc sức khỏe từ những điều giản dị, bắt đầu từ nguồn thực phẩm tươi mới mỗi ngày. “Fruité Garden – Fresh, Clean, and Naturally Delicious.”",
                "price" => 19000,
                "inventory" => 20,
                "facebook" => "abc",
                "instagram" => "abc",
                "linkedin" => "abc",
                "twitter" => "abc",
                "category_id" => 2,
            ],
        ];

        DB::table('products')->insert($products);
    }
}
